<?php

function validateInput($input, $type) {
    switch ($type) {
        case 'string':
            return filter_var($input, FILTER_SANITIZE_SPECIAL_CHARS);
        case 'int':
            return filter_var($input, FILTER_VALIDATE_INT);
        case 'url':
            return filter_var($input, FILTER_VALIDATE_URL);
        default:
            return $input;
    }
}

function validate_NotPreviouslyRegistered()
{
  foreach ($avail_Reg_Courses as $course) {
    $code = $course->getCode();
    $registered = $course->getRegistered();
    if ($code == $selectCourseElementName && $registered === 1) {
      return "You are already registered for $code.<br>";
    }
  }
  
  return "";
}
?>
