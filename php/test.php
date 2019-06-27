<?php
try {
    throw new \Exception();
} catch(\Error $e) {
    var_dump($e->getMessage());    
}
