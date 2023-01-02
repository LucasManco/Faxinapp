
import AsyncStorage from '@react-native-community/async-storage';

// const BASE_API = 'http://10.0.2.2:8000/api';
const BASE_API = 'http://192.168.2.117:8000/api';



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

export async function searchEmployees(date, address,categories,employeeRereived) {
    var employeeList = [];
    const token = await AsyncStorage.getItem('token');
    const body = {
        'date' : date,
        'address' : address,
        'categories' : categories
    };
    const req = await fetch(`${BASE_API}/searchEmployees`,{
        method: 'post',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        },
        body: JSON.stringify(body)

    });
    
    employeeList = await req.json();    
    employeeRereived(employeeList);
}

export async function getEmployeesByDate(employeeRereived, date) {
    var employeeList = [];
    const token = await AsyncStorage.getItem('token');

    const req = await fetch(`${BASE_API}/employee`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        },
        body: JSON.stringify(date)
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

export async function getEmployeeServicesList(jobListRereived, id) {
    var jobTypeList = [];
    const token = await AsyncStorage.getItem('token');

    const req = await fetch(`${BASE_API}/employee/job-list/${id}`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    
    jobTypeList = await req.json();    
    jobListRereived(jobTypeList);
}

export async function getEmployeeAgenda(agendaRereived, id) {

    var dateList = [];
    const token = await AsyncStorage.getItem('token');

    const req = await fetch(`${BASE_API}/employee/agenda/${id}`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    dateList = await req.json();    
    agendaRereived(dateList);

}

export async function storeJob(job) {
    var dateList = [];
    const token = await AsyncStorage.getItem('token');

    const req = await fetch(`${BASE_API}/job`, {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        },
        body: JSON.stringify(job)
    });
    const json = await req.json();        
    return json;
}

export async function getDefaultAddress(addressRereived){
    const token = await AsyncStorage.getItem('token');
    const req = await fetch(`${BASE_API}/user/getDefaultAddress`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    address = await req.json();   
    code = await req.status;
    if(code == 404){
        addressRereived(null);    
    }

    addressRereived(address);
}
export async function getIsFavorited (id, favoritedRereived){
    const token = await AsyncStorage.getItem('token');    
    const req = await fetch(`${BASE_API}/getIsFavorited/${id}`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    asw = await req.json();  
    favoritedRereived(asw[0]);
}

export async function getFavorites (favoritesRereived){
    const token = await AsyncStorage.getItem('token');    
    const req = await fetch(`${BASE_API}/favorites`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    asw = await req.json();  
    favoritesRereived(asw);
}

export async function getReviews (reviewRereived, id){
    const token = await AsyncStorage.getItem('token');    
    console.log(id);
    const req = await fetch(`${BASE_API}/employee/${id}/reviews`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    asw = await req.json();  
    console.log(asw);
    reviewRereived(asw);
}
