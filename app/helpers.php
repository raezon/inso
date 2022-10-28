<?php

function getLoggedInEmployee(){
    return auth('api')->user()->load(['employee']);
}