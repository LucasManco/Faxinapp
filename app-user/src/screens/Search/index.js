
import React, {useEffect, useState} from 'react';
import {Text} from 'react-native';
import {Container} from './styles';
import EmployeeItem from '../../components/EmployeeItem';
import {getEmployees} from '../../api/EmployeeApi'


export default() => {
    const [employees, setEmployees] = useState([]);
    getEmployees(setEmployees);
    

    return (
        <Container>
            <Text>Search</Text>
                {/* {employees.forEach((employee)=> {
                    <>
                        <Text>employee</Text>
                        <Text>{employee.userId}</Text>
                    </>
                })} */}
                
                {employees.map((item, k)=>(
                    <EmployeeItem key={k} data={item} />
                ))}

        </Container>
    );
}
