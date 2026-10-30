<?php
require_once __DIR__ . '/includes/config.php';
if (is_logged_in()) { header('Location: index.php'); exit; }

$errors = [];
$email = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if (!csrf_check()) {
        $errors[] = 'Session expired. Please try again.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
        $errors[] = 'Enter a valid email and password.';
    } else {
        $pdo = db();
        if (!$pdo) {
            $errors[] = 'Database unavailable. Import database.sql and check includes/config.php.';
        } else {
            $stmt = $pdo->prepare('SELECT id, name, password_hash FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user['password_hash'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = (int)$user['id'];
                $_SESSION['user_name'] = $user['name'];
                header('Location: index.php'); exit;
            }
            $errors[] = 'Incorrect email or password.';
        }
    }
}

$page_title = 'Login';
require __DIR__ . '/includes/header.php';
?>
<section class="auth-wrap">
  <div class="auth-card">
    <h1>Welcome back</h1>
    <p class="muted">Log in to manage your bookings and vehicle history.</p>
    <?php foreach ($errors as $err): ?><div class="alert"><?= e($err) ?></div><?php endforeach; ?>
    <form method="post" novalidate>
      <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
      <label>Email
        <input type="email" name="email" value="<?= e($email) ?>" required autocomplete="email">
      </label>
      <label>Password
        <input type="password" name="password" required autocomplete="current-password">
      </label>
      <button class="btn btn-red btn-block" type="submit">Log In</button>
    </form>
    <p class="auth-alt">New here? <a href="signup.php">Create an account</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
