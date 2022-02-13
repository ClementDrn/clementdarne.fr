<?php

function error($errorCode) {
  readfile(__DIR__."/../errors/$errorCode.html");
}
