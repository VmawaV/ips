<?php
function DELETE(string $name): ?string
{
  $lines = file('php://input');
  $keyLinePrefix = 'Content-Disposition: form-data; name="';
  $DELETE = [];
  $findLineNum = null;
  foreach ($lines as $num => $line) {
    if (strpos($line, $keyLinePrefix) !== false) {
      if ($findLineNum) {
        break;
      }
      if ($name !== substr($line, 38, -3)) {
        continue;
      }
      $findLineNum = $num;
    } else if ($findLineNum) {
      $DELETE[] = $line;
    }
  }
  array_shift($DELETE);
  array_pop($DELETE);
  $data = mb_substr(implode('', $DELETE), 0, -2, 'UTF-8');
  return $data === '' ? null : $data;
}

function PUT(string $name): ?string
{
  $lines = PUT_LINES();
  if (!$lines) return null;

  $keyLinePrefix = 'Content-Disposition: form-data; name="';
  $buf = [];
  $findLineNum = null;
  foreach ($lines as $num => $line) {
    if (strpos($line, $keyLinePrefix) !== false) {
      if ($findLineNum) break;
      if ($name !== substr($line, 38, -3)) {
        continue;
      }
      $findLineNum = $num;
    } else if ($findLineNum) {
      $buf[] = $line;
    }
  }
  if (!$findLineNum) return null;
  array_shift($buf);
  array_pop($buf);
  $data = mb_substr(implode('', $buf), 0, -2, 'UTF-8');
  return $data === '' ? null : $data;
}

function PUT_LINES(): array {
  static $lines = null;
  if ($lines === null) {
    $lines = @file('php://input');
    if ($lines === false) $lines = [];
  }
  return $lines;
}

function PUT_MULTI(string $name): ?array {
  $lines   = PUT_LINES();
  $prefix  = 'Content-Disposition: form-data; name="';
  $targets = [$name, $name.'[]'];

  $values = [];
  $capturing = false;
  $buf = [];

  foreach ($lines as $line) {
    if (strpos($line, $prefix) !== false) {
      if ($capturing) {
        array_shift($buf);
        array_pop($buf);
        $values[] = mb_substr(implode('', $buf), 0, -2, 'UTF-8');
        $buf = [];
        $capturing = false;
      }
      $field = substr($line, 38, -3);
      if (in_array($field, $targets, true)) {
        $capturing = true;
      }
    } elseif ($capturing) {
      $buf[] = $line;
    }
  }

  if ($capturing) {
    array_shift($buf);
    array_pop($buf);
    $values[] = mb_substr(implode('', $buf), 0, -2, 'UTF-8');
  }

  if (empty($values)) return null;

  $values = array_values(array_filter(array_map('trim', $values), fn($v) => $v !== ''));
  return $values ?: null;
}
