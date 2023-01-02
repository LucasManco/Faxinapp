
import AsyncStorage from '@react-native-community/async-storage';

// const BASE_API = 'http://10.0.2.2:8000/api';
const BASE_API = 'http://192.168.2.117:8000/api';



export async function getJobs(jobRereived,selectedStatus) {
    var job = [];
    const token = await AsyncStorage.getItem('token');
    const req = await fetch(`${BASE_API}/job/ByStatus`,{
        method: 'POST',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        },
        body: JSON.stringify({'status' : selectedStatus})
    });
    
    job = await req.json();
    jobRereived(job);
}


export async function getJob(jobRereived, id) {
    var job = [];
    const token = await AsyncStorage.getItem('token');
    const req = await fetch(`${BASE_API}/job/${id}`,{
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

export async function finishJob(body, id) {
    var job = [];
    const token = await AsyncStorage.getItem('token');
    const req = await fetch(`${BASE_API}/job/${id}/finish`,{
        method: 'POST',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        },
        body: JSON.stringify(body)

    });
    
    job = await req.json();
}