<?php

/**
 * Because the files like Enums.php contain multiple classes
 * we can't use psr-4 autoloading. Instead we
 * can manually load our library files here and reference this
 * in the psr-4 files array in composer.json
 *
 * note - the order of loading here is important...
 */

require_once __DIR__ . '/options/BaseOptions.php';
require_once __DIR__ . '/options/CommonFormattingOptions.php';
require_once __DIR__ . '/options/CaptionOptions.php';
require_once __DIR__ . '/options/JobListOptions.php';
require_once __DIR__ . '/options/PerformTranscriptionOptions.php';
require_once __DIR__ . '/options/TranscriptionOptions.php';

require_once __DIR__ . '/Enums.php';
require_once __DIR__ . '/WebUtils.php';
require_once __DIR__ . '/Actions.php';
