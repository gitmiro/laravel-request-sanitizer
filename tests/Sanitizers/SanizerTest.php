<?php

namespace ArondeParon\RequestSanitizer\Tests\Sanitizers;

use ArondeParon\RequestSanitizer\Sanitizers\Capitalize;
use ArondeParon\RequestSanitizer\Sanitizers\Lowercase;
use ArondeParon\RequestSanitizer\Sanitizers\RemoveNonNumeric;
use ArondeParon\RequestSanitizer\Sanitizers\Trim;
use ArondeParon\RequestSanitizer\Sanitizers\TrimDuplicateSpaces;
use ArondeParon\RequestSanitizer\Sanitizers\Uppercase;
use ArondeParon\RequestSanitizer\Tests\TestCase;

class SanizerTest extends TestCase
{
    public function test_uppercase_sanitizer()
    {
        $sanitizer = new Uppercase();
        $output = $sanitizer->sanitize('test');
        $this->assertEquals('TEST', $output);
    }

    public function test_lowercase_sanitizer()
    {
        $sanitizer = new Lowercase();
        $output = $sanitizer->sanitize('TEST');
        $this->assertEquals('test', $output);
    }

    public function test_capitalize_sanitizer()
    {
        $sanitizer = new Capitalize();
        $output = $sanitizer->sanitize('test');
        $this->assertEquals('Test', $output);
    }

    public function test_trim_sanitizer()
    {
        $sanitizer = new Trim();
        $output = $sanitizer->sanitize('test ');
        $this->assertEquals('test', $output);
    }

    public function test_trim_duplicate_spaces_sanitizer()
    {
        $sanitizer = new TrimDuplicateSpaces();
        $output = $sanitizer->sanitize('test     ');
        $this->assertEquals('test ', $output);
    }

    public function test_remove_non_numeric_sanitizer()
    {
        $sanitizer = new RemoveNonNumeric();
        $output = $sanitizer->sanitize('test1234-134AC~');
        $this->assertEquals('1234134', $output);
    }
}