Hello {{ $orders->receiver }},
This is a demo email for testing purposes! Also, it's the HTML version.

Demo object values:

Demo One: {{ $orders->demo_one }}
Demo Two: {{ $orders->demo_two }}

Values passed by With method:

testVarOne: {{ $testVarOne }}
testVarOne: {{ $testVarOne }}

Thank You,
{{ $orders->sender }}<?php
