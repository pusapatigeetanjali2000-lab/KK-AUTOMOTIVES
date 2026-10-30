<?php
// Original line-art illustrations of common mechanical car parts (inline SVG, themed via CSS currentColor).
function part_svg(string $key): string {
    $open = '<svg viewBox="0 0 120 120" class="part-svg" role="img" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">';
    $shapes = [
        // Brake disc with calliper
        'brake' => '<circle cx="60" cy="60" r="46"/><circle cx="60" cy="60" r="14"/><circle cx="60" cy="30" r="4"/><circle cx="60" cy="90" r="4"/><circle cx="30" cy="60" r="4"/><circle cx="90" cy="60" r="4"/><circle cx="60" cy="60" r="32" stroke-dasharray="3 6"/><path class="accent" d="M88 28c10 8 16 20 16 32s-6 24-16 32"/>',
        // Piston
        'piston' => '<rect x="34" y="14" width="52" height="46" rx="6"/><path d="M34 26h52M34 36h52M34 46h52"/><circle cx="60" cy="68" r="6"/><path class="accent" d="M60 74v14"/><circle cx="60" cy="100" r="10"/><circle cx="60" cy="100" r="3"/>',
        // Spark plug
        'spark' => '<rect x="46" y="10" width="28" height="14" rx="3"/><path d="M50 24v36h20V24"/><path d="M44 60h32l-4 12H48z"/><path d="M52 72v22h16V72"/><path class="accent" d="M60 94v14M56 108h8"/>',
        // Shock absorber / coil spring
        'suspension' => '<path d="M60 10v14"/><rect x="52" y="24" width="16" height="12" rx="2"/><path class="accent" d="M42 40c12-6 24-6 36 0M42 52c12-6 24-6 36 0M42 64c12-6 24-6 36 0M42 76c12-6 24-6 36 0"/><path d="M60 78v22"/><circle cx="60" cy="108" r="6"/>',
        // Battery
        'battery' => '<rect x="14" y="40" width="92" height="56" rx="6"/><path d="M30 40V30h14v10M76 40V30h14v10"/><path class="accent" d="M32 68h18M41 59v18M70 68h18"/>',
        // Gear / transmission
        'gear' => '<circle cx="60" cy="60" r="16"/><path d="M60 8v14M60 98v14M8 60h14M98 60h14M23 23l10 10M87 87l10 10M97 23L87 33M33 87L23 97"/><circle cx="60" cy="60" r="34" class="accent"/>',
        // Radiator / cooling
        'radiator' => '<rect x="16" y="26" width="88" height="68" rx="6"/><path d="M30 38v44M45 38v44M60 38v44M75 38v44M90 38v44"/><path class="accent" d="M16 14h20M84 14h20M26 14v12M94 14v12"/>',
        // Engine block
        'engine' => '<path d="M20 48h80v40H20z"/><path d="M30 48V34h20v14M70 48V34h20v14"/><path class="accent" d="M44 28h32M12 60h8M12 76h8M100 60h8M100 76h8"/><circle cx="60" cy="68" r="10"/>',
        // Oil can
        'oil' => '<path d="M28 44h50l10 10v38H28z"/><path d="M78 44l24-16 8 8-18 18"/><path class="accent" d="M44 66c6 8 14 8 20 0-4-8-8-14-10-18-2 4-6 10-10 18z"/>',
    ];
    return $open . ($shapes[$key] ?? '') . '</svg>';
}
