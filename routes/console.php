<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('check:popular')->hourly();
