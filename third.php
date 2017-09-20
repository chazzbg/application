<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
// 3GB is not a file that can be open by a trivial solution
// because of that i used a fairly simple streaming imlpementation which can load the JSON element by element
// it relies on listeners which are the actual data consumers
// in UniqueListener, i've used primitive hashmap to store the modes and the times they are found in the data

$listener = new \App\Listeners\UniqueListener();
$stream = bzopen( '/home/storage/Downloads/bigf.json.bz2', 'r' );

try {
    $parser = new \JsonStreamingParser\Parser( $stream, $listener );
    $parser->parse();
    bzclose( $stream );
    var_dump($listener->getModels());
} catch ( \Exception $e ) {
    bzclose( $stream );
}