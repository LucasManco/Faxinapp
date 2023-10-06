
import { AsyncStorage } from 'react-native';

// const BASE_API = 'http://10.0.2.2:8000/api';
const BASE_API = 'http://192.168.2.145/api';



export async function getService(jobRereived, id) {
    var job = [];
    const token = await AsyncStorage.getItem('token');
    const req = await fetch(`${BASE_API}/job-type/${id}`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    
    job = await req.json();
    jobRereived(job);
}

export async function getServiceAdditionals(jobRereived, id) {
    var job = [];
    const token = await AsyncStorage.getItem('token');
    const req = await fetch(`${BASE_API}/job-type/additionals/${id}`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    
    job = await req.json();
    jobRereived(job);
}


