<?php


namespace UnitTests\POData\Providers\Metadata\Type;

use POData\Providers\Metadata\Type\Binary;
use POData\Providers\Metadata\Type\Boolean;
use POData\Providers\Metadata\Type\Byte;
use POData\Providers\Metadata\Type\Char;
use POData\Providers\Metadata\Type\DateTime;
use POData\Providers\Metadata\Type\Decimal;
use POData\Providers\Metadata\Type\Double;
use POData\Providers\Metadata\Type\Guid;
use POData\Providers\Metadata\Type\Int16;
use POData\Providers\Metadata\Type\Int32;
use POData\Providers\Metadata\Type\Int64;
use POData\Providers\Metadata\Type\IType;
use POData\Providers\Metadata\Type\Navigation;
use POData\Providers\Metadata\Type\NullType;
use POData\Providers\Metadata\Type\SByte;
use POData\Providers\Metadata\Type\Single;
use POData\Providers\Metadata\Type\StringType;
use POData\Providers\Metadata\Type\TypeCode;
use POData\Providers\Metadata\Type\VoidType;
use PHPUnit\Framework\TestCase;

class DecimalTest extends TestCase {

	/**
	 * @return IType
	 */
	public function getAsIType()
	{
		return new Decimal();
	}

	public function testConstructorAndDefaultValues()
	{
		$type = $this->getAsIType();

		$actual = get_object_vars($type);

		$expected = array(

		);

		$this->assertEquals($expected, $actual);

	}


	public function testGetFullTypeName()
	{
		$type = $this->getAsIType();

		$actual = $type->getFullTypeName();

		$this->assertEquals("Edm.Decimal", $actual);

	}

	public function testGetTypeCode()
	{
		$type = $this->getAsIType();

		$actual = $type->getTypeCode();

		$this->assertEquals(TypeCode::DECIMAL, $actual);

	}

	public function testCompatibleWith()
	{
		$type = $this->getAsIType();

		$this->assertFalse( $type->isCompatibleWith(new Binary()) );
		$this->assertFalse( $type->isCompatibleWith(new Boolean()) );
		$this->assertTrue( $type->isCompatibleWith(new Byte()) );
		$this->assertFalse( $type->isCompatibleWith(new Char()) );
		$this->assertFalse( $type->isCompatibleWith(new DateTime()) );
		$this->assertTrue( $type->isCompatibleWith(new Decimal()) );
		$this->assertTrue( $type->isCompatibleWith(new Double()) );
		$this->assertFalse( $type->isCompatibleWith(new Guid()) );
		$this->assertTrue( $type->isCompatibleWith(new Int16()) );
		$this->assertTrue( $type->isCompatibleWith(new Int32()) );
		$this->assertTrue( $type->isCompatibleWith(new Int64()) );
		$this->assertFalse( $type->isCompatibleWith(new NullType()) );
		$this->assertTrue( $type->isCompatibleWith(new SByte()) );
		$this->assertFalse( $type->isCompatibleWith(new Single()) );
		$this->assertFalse( $type->isCompatibleWith(new StringType()) );
		$this->assertFalse( $type->isCompatibleWith(new VoidType()) );



	}

	public function testValidateSuccess()
	{
		$this->markTestSkipped("Too lazy see #66");
	}


	public function testValidateFailure()
	{

		$this->markTestSkipped("Too lazy see #66");

	}


	public function testConvert()
	{

		$type = $this->getAsIType();

		$value = "-3434.4331M";
		$actual = $type->convert($value);

		$expected = -3434.4331;
		$this->assertEquals($expected, $actual);
	}

	public function testConvertToOData()
	{

		$type = $this->getAsIType();

		$value = -3434.4331;
		$actual = $type->convertToOData($value);

		$expected = "-3434.4331M";
		$this->assertEquals($expected, $actual);
	}



	/**************
	 *
	 *  Begin Type Specific Tests
	 *
	 */
}