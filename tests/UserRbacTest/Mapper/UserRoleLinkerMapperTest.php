<?php
namespace UserRbacTest\Mapper;

use UserRbac\Mapper\UserRoleLinkerMapper;
use ZfcUser\Entity\User;
use UserRbac\Entity\UserRoleLinker;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class UserRoleLinkerMapperTest extends \PHPUnit_Framework_TestCase
{
    public function testFindByUser()
    {
        $mapper = new UserRoleLinkerMapper;
        $user = new User;
        $user->setId(13);
        $mapper->setEntityPrototype(new UserRoleLinker);
        $adapter = $this->getMockBuilder('Zend\Db\Adapter\Adapter')
            ->disableOriginalConstructor()
            ->getMock();
        $mapper->setDbAdapter($adapter);
        $sql = $this->getMockBuilder('Zend\Db\Sql\Sql')
            ->disableOriginalConstructor()
            ->getMock();
        $stmt = $this->getMock('Zend\Db\Adapter\Driver\StatementInterface');
        $sql->expects($this->once())
            ->method('prepareStatementForSqlObject')
            ->will($this->returnValue($stmt));
        
        $stmt->expects($this->once())
            ->method('execute')
            ->will($this->returnValue([['user_id' => 13, 'role_id' => 'role1'], ['user_id' => 13, 'role_id' => 'role2']])); 
        $this->getMethod('setSlaveSql')->invokeArgs($mapper, [$sql]);
        $sql->expects($this->once())
            ->method('select')
            ->will($this->returnValue(new Select)); 
        $resultSet =  $mapper->findByUser($user);
        $expectedResultArray = [new UserRoleLinker($user, 'role1'), new UserRoleLinker($user, 'role2')]; 
        $this->assertEquals(count($expectedResultArray), count($resultSet));
        foreach ($resultSet as $i => $result) {
            $this->assertEquals($expectedResultArray[$i]->getRoleId(), $result->getRoleId());
            $this->assertEquals($expectedResultArray[$i]->getUserId(), $result->getUserId());
        }
    }

    protected function getMethod($name) 
    {
        $class = new \ReflectionClass('UserRbac\Mapper\UserRoleLinkerMapper');
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }
}
