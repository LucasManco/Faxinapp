
import AsyncStorage from '@react-native-community/async-storage';

const BASE_API = 'http://10.0.2.2:8000/api';


export async function getEmployees(employeeRereived) {
    var employeeList = [];
    const token = await AsyncStorage.getItem('token');

    const req = await fetch(`${BASE_API}/employee`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    
    employeeList = await req.json();    

    employeeRereived(employeeList);
}

export async function getEmployee(id) {
    var employeeList = [];
    const token = await AsyncStorage.getItem('token');

    const req = await fetch(`${BASE_API}/employee/${id}`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    
    employeeList = await req.json();    

    employeeRereived(employeeList);
}

export async function getEmployeeServicesList(uid) {
    var servicesList = [
        {
            nome: "Serviço 1",
            preco: "13.3"
        },
        {
            nome: "Serviço 2",
            preco: "99.9"
        },
        {
            nome: "Serviço 3",
            preco: "91"
        },
        {
            nome: "Serviço 4",
            preco: "99.999"
        },
        {
            nome: "Serviço 5",
            preco: "11199.11"
        }
    ]
    return servicesList;
}

export async function getEmployeeAgenda(uid) {

    var servicesList = [
        {
            date: "2022-05-12",
            hours: [
                "09:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-13",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-14",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-15",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "10:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-16",
            hours: [
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-17",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-18",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-19",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
    ]
    return servicesList;
}