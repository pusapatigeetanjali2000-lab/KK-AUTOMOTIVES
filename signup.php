<?php
require_once __DIR__ . '/includes/config.php';
if (is_logged_in()) { header('Location: index.php'); exit; }

$errors = [];
$old = ['name' => '', 'email' => '', 'phone' => ''];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['name']  = trim($_POST['name'] ?? '');
    $old['email'] = trim($_POST['email'] ?? '');
    $old['phone'] = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm'] ?? '';

    if (!csrf_check()) $errors[] = 'Session expired. Please try again.';
    if (mb_strlen($old['name']) < 2) $errors[] = 'Please enter your full name.';
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Enter a valid email address.';
    if ($old['phone'] !== '' && !preg_match('/^[0-9+\-\s]{7,15}$/', $old['phone'])) $errors[] = 'Enter a valid phone number.';
    if (strlen($password) < 8) $errors[] = 'Password must be at least 8 characters.';
    if ($password !== $confirm) $errors[] = 'Passwords do not match.';

    if (!$errors) {
        $pdo = db();
        if (!$pdo) {
            $errors[] = 'Database unavailable. Import database.sql and check includes/config.php.';
        } else {
            $check = $pdo->prepare('SELECT id FROM users WHERE email = ?');
            $check->execute([$old['email']]);
            if ($check->fetch()) {
                $errors[] = 'An account with this email already exists.';
            } else {
                $ins = $pdo->prepare('INSERT INTO users (name, email, phone, password_hash) VALUES (?, ?, ?, ?)');
                $ins->execute([$old['name'], $old['email'], $old['phone'], password_hash($password, PASSWORD_DEFAULT)]);
                session_regenerate_id(true);
                $_SESSION['user_id'] = (int)$pdo->lastInsertId();
                $_SESSION['user_name'] = $old['name'];
                header('Location: index.php'); exit;
            }
        }
    }
}

$page_title = 'Sign Up';
require __DIR__ . '/includes/header.php';
?>
<section class="auth-wrap">
  <div class="auth-card">
    <h1>Create your account</h1>
    <p class="muted">Book services, track repairs and get member-only offers.</p>
    <?php foreach ($errors as $err): ?><div class="alert"><?= e($err) ?></div><?php endforeach; ?>
    <form method="post" novalidate>
      <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
      <label>Full name
        <input type="text" name="name" value="<?= e($old['name']) ?>" required autocomplete="name">
      </label>
      <label>Email
        <input type="email" name="email" value="<?= e($old['email']) ?>" required autocomplete="email">
      </label>
      <label>Phone <span class="opt">(optional)</span>
        <input type="tel" name="phone" value="<?= e($old['phone']) ?>" autocomplete="tel">
      </label>
      <div class="row-2">
        <label>Password
          <input type="password" name="password" minlength="8" required autocomplete="new-password">
        </label>
        <label>Confirm
          <input type="password" name="confirm" minlength="8" required autocomplete="new-password">
        </label>
      </div>
      <button class="btn btn-red btn-block" type="submit">Create Account</button>
    </form>
    <p class="auth-alt">Already registered? <a href="login.php">Log in</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
