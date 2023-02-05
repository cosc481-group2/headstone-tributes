<?php

function isValidDate(?string $date) : bool {
  if (is_null($date)) // this avoids deprication warning output
    return false;
  elseif (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
      return true;
  }
  return false;
}


