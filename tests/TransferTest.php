<?php

namespace Stripe;

class TransferTest extends TestCase
{
    public function testCreate()
    {
        $transfer = self::createTestTransfer();

        $this->assertSame('transfer', $transfer->object);
    }

    public function testRetrieve()
    {
        $transfer = self::createTestTransfer();

        $reloaded = Transfer::retrieve($transfer->id);
        $this->assertSame($reloaded->id, $transfer->id);
    }

    public function testTransferUpdateMetadata()
    {
        $transfer = self::createTestTransfer();

        $transfer->metadata['test'] = 'foo bar';
        $transfer->save();

        $updatedTransfer = Transfer::retrieve($transfer->id);
        $this->assertSame('foo bar', $updatedTransfer->metadata['test']);
    }

    public function testTransferUpdateMetadataAll()
    {
        $transfer = self::createTestTransfer();

        $transfer->metadata = array('test' => 'foo bar');
        $transfer->save();

        $updatedTransfer = Transfer::retrieve($transfer->id);
        $this->assertSame('foo bar', $updatedTransfer->metadata['test']);
    }
}
