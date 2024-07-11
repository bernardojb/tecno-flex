<?php

# --------------------------------------------------
# Limit words
# --------------------------------------------------
function limitWords($string, $limit)
{
  $words = explode(" ",$string);
  # ----------
  return implode(" ", array_splice($words, 0, $limit));
}
