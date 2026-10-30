<?php
require_once __DIR__ . '/includes/icons.php';
$page_title = 'Precision Car Care & Mechanical Parts';
require __DIR__ . '/includes/header.php';

$services = [
    ['engine',     'Engine Repair & Overhaul', 'Full diagnostics, head gasket, timing belt/chain, tune-ups and complete rebuilds.'],
    ['gear',       'Transmission & Clutch',    'Manual and automatic gearbox service, clutch kits, flywheel and drivetrain repair.'],
    ['brake',      'Brakes',                   'Pads, rotors, callipers, brake fluid and ABS checks for confident stopping power.'],
    ['suspension', 'Suspension & Steering',    'Shocks, struts, bushings, alignment and balancing for a smooth, stable ride.'],
    ['battery',    'Electrical & Battery',     'Alternators, starters, wiring faults, ECU scans and battery testing.'],
    ['radiator',   'AC & Cooling System',      'Radiator flush, coolant, water pump, thermostat and air-conditioning service.'],
];
$parts = [
    ['spark',      'Spark Plugs',        'Ignition'],
    ['piston',     'Pistons & Rings',    'Engine'],
    ['brake',      'Brake Discs',        'Brakes'],
    ['suspension', 'Coil Springs',       'Suspension'],
    ['oil',        'Engine Oils',        'Fluids'],
    ['radiator',   'Radiators',          'Cooling'],
    ['battery',    'Batteries',          'Electrical'],
    ['gear',       'Gear Sets',          'Transmission'],
];
$stats = [['15+','Years of experience'],['25k+','Vehicles serviced'],['120+','Point inspection'],['6 mo','Service warranty']];
?>

<section class="hero">
  <div class="container hero-grid">
    <div class="hero-copy">
      <span class="eyebrow">Mechanical &bull; Automotive &bull; Precision</span>
      <h1>Keep your car <span class="red">running</span> like new.</h1>
      <p>From engine to exhaust, KK Automotive delivers honest diagnostics, genuine parts and expert mechanical work &mdash; done right, the first time.</p>
      <div class="hero-actions">
        <a href="signup.php" class="btn btn-red">Book a Service</a>
        <a href="#services" class="btn btn-outline-light">Explore Services</a>
      </div>
    </div>
    <div class="hero-art" aria-hidden="true">
      <div class="gear-bg"><?= part_svg('gear') ?></div>
      <div class="hero-card"><?= part_svg('engine') ?><span>Engine Diagnostics</span></div>
    </div>
  </div>
  <div class="container stats">
    <?php foreach ($stats as [$n, $l]): ?>
      <div class="stat"><strong><?= e($n) ?></strong><span><?= e($l) ?></span></div>
    <?php endforeach; ?>
  </div>
</section>

<?php
// Use a real red-car photo if one has been dropped into assets/img/ (transparent PNG works best); otherwise use the built-in vector car.
$carPhoto = null;
foreach (['red-car.png', 'red-car.webp', 'red-car.jpg'] as $f) {
    if (is_file(__DIR__ . '/assets/img/' . $f)) { $carPhoto = 'assets/img/' . $f; break; }
}
?>
<section class="road-scene" aria-label="Red car driving along the road">
  <div class="road-copy container">
    <span class="eyebrow">Performance you can feel</span>
    <h2>Built for the <span class="red">road ahead</span></h2>
    <p>Tuned, serviced and road-ready &mdash; every kilometre counts.</p>
  </div>
  <div class="speed-lines" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></div>
  <div class="car" aria-hidden="true">
    <div class="car-body">
      <?php if ($carPhoto): ?>
        <img src="<?= e($carPhoto) ?>" alt="Red car" class="car-photo">
      <?php else: ?>
        <svg viewBox="0 0 600 220" class="car-svg" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="carRed" x1="0" y1="0" x2="0" y2="1">
              <stop offset="0" stop-color="#ff2a1f"/><stop offset=".55" stop-color="#d40a00"/><stop offset="1" stop-color="#7d0707"/>
            </linearGradient>
            <linearGradient id="glass" x1="0" y1="0" x2="1" y2="1">
              <stop offset="0" stop-color="#8fa3b8"/><stop offset="1" stop-color="#1c232c"/>
            </linearGradient>
          </defs>
          <ellipse cx="300" cy="196" rx="270" ry="10" fill="rgba(0,0,0,.45)"/>
          <path d="M30 156C30 134 42 124 72 119L150 106C176 82 216 62 272 60H380C432 62 466 86 490 110L540 118C566 122 576 136 576 152V166H30Z" fill="url(#carRed)"/>
          <path d="M178 106C198 86 228 74 272 72H334V106ZM350 72H384C416 74 440 90 458 108H350Z" fill="url(#glass)"/>
          <path d="M60 138H560" stroke="#ff6a5c" stroke-width="2" opacity=".55"/>
          <path d="M340 72V150" stroke="#7d0707" stroke-width="3"/>
          <path d="M556 126l16 4v10l-18-2z" fill="#fff3b0"/>
          <rect x="30" y="130" width="12" height="10" rx="2" fill="#ff8a80"/>
          <circle cx="136" cy="166" r="44" fill="#0f1115"/>
          <circle cx="470" cy="166" r="44" fill="#0f1115"/>
          <g class="wheel" style="transform-origin:136px 166px">
            <circle cx="136" cy="166" r="34" fill="#23272e"/><circle cx="136" cy="166" r="22" fill="#c9ced6"/>
            <path d="M136 146v40M116 166h40M122 152l28 28M150 152l-28 28" stroke="#5b6068" stroke-width="5"/><circle cx="136" cy="166" r="6" fill="#16191f"/>
          </g>
          <g class="wheel" style="transform-origin:470px 166px">
            <circle cx="470" cy="166" r="34" fill="#23272e"/><circle cx="470" cy="166" r="22" fill="#c9ced6"/>
            <path d="M470 146v40M450 166h40M456 152l28 28M484 152l-28 28" stroke="#5b6068" stroke-width="5"/><circle cx="470" cy="166" r="6" fill="#16191f"/>
          </g>
        </svg>
      <?php endif; ?>
    </div>
  </div>
  <div class="road"></div>
</section>

<section class="section" id="services">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">What we do</span>
      <h2>Complete mechanical services</h2>
      <p>Everything under the hood and beneath the chassis, handled by trained technicians.</p>
    </div>
    <div class="grid grid-3">
      <?php foreach ($services as [$icon, $title, $text]): ?>
        <article class="card service-card">
          <div class="icon"><?= part_svg($icon) ?></div>
          <h3><?= e($title) ?></h3>
          <p><?= e($text) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-dark" id="parts">
  <div class="container">
    <div class="section-head light">
      <span class="eyebrow">Genuine components</span>
      <h2>Popular car parts</h2>
      <p>Quality-tested parts matched to your vehicle's specification.</p>
    </div>
    <div class="grid grid-4">
      <?php foreach ($parts as [$icon, $name, $cat]): ?>
        <article class="part-card">
          <div class="part-art"><?= part_svg($icon) ?></div>
          <small><?= e($cat) ?></small>
          <h3><?= e($name) ?></h3>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section" id="why">
  <div class="container why-grid">
    <div>
      <span class="eyebrow">Why KK Automotive</span>
      <h2>Built on trust, tuned for performance</h2>
      <ul class="checks">
        <li><strong>Transparent pricing</strong> &mdash; clear estimates before any work begins.</li>
        <li><strong>Certified technicians</strong> &mdash; experienced with all major makes.</li>
        <li><strong>Genuine parts</strong> &mdash; backed by a service warranty.</li>
        <li><strong>Fast turnaround</strong> &mdash; most services completed the same day.</li>
      </ul>
    </div>
    <div class="cta-box">
      <h3>Ready for a smoother drive?</h3>
      <p>Create a free account to book services and track your vehicle history.</p>
      <a href="signup.php" class="btn btn-red">Create Free Account</a>
      <a href="login.php" class="link-light">Already a member? Log in</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
