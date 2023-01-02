// const BASE_API = 'http://10.0.2.2:8000/api';
import AsyncStorage from '@react-native-community/async-storage';

const BASE_API = 'http://192.168.2.117:8000/api';


export default {
    checkToken: async (token) => {
        const req = await fetch(`${BASE_API}/user`,{
            method: 'GET',
            headers:{
                Accept: 'application/json',
                'Content-Type': 'application/json',
                'Authorization' : `Bearer ${token}`
            }
        });
        const json = await req.json();
        return json;
    },
    signIn: async (email, password) => {
        const req = await fetch(`${BASE_API}/login`, {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({email, password})
        });
        const json = await req.json();        
        return json;
    },
    signUp: async (name, email, password) =>{
        const req = await fetch(`${BASE_API}/register`,{
            method: 'POST',
            headers:{
                Accept: 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({name, email,password})
        });
        const json = await req.json();
        return json;
    },
    logout: async () =>{
        const token = await AsyncStorage.getItem('token');

        const req = await fetch(`${BASE_API}/logout`,{
            method: 'POST',
            headers:{
                Accept: 'application/json',
                'Content-Type': 'application/json',
                'Authorization' : `Bearer ${token}`
            }
        });
        const json = await req.json();
        return json;
    }
}

export async function getAddress (addressRereived, id){
    const token = await AsyncStorage.getItem('token');
    const req = await fetch(`${BASE_API}/address/${id}`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    address = await req.json();    
    addressRereived(address);
}

export async function updateAddress (address){
    const token = await AsyncStorage.getItem('token');    
    const req = await fetch(`${BASE_API}/address/${address.id}`,{
        method: 'PUT',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        },
        body: JSON.stringify(address)
    });
    address = await req.json();    
}


export async function storeAddress (address){
    const token = await AsyncStorage.getItem('token');    
    const req = await fetch(`${BASE_API}/address`,{
        method: 'POST',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        },
        body: JSON.stringify(address)
    });
    address = await req.json();    
}


export async function getAddresses (addressRereived){
    const token = await AsyncStorage.getItem('token');
    const req = await fetch(`${BASE_API}/address`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    addresses = await req.json();    
    addressRereived(addresses);
}
export async function setDefaultAddress (id, addressRereived){
    const token = await AsyncStorage.getItem('token');
    const req = await fetch(`${BASE_API}/address/setDefault/${id}`,{
        method: 'PUT',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    addresses = await req.json();    
    addressRereived(addresses);
}

export async function addFavorites (id){
    const token = await AsyncStorage.getItem('token');    
    const req = await fetch(`${BASE_API}/addFavorite/${id}`,{
        method: 'POST',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    address = await req.json();    
}

export async function removeFavorites (id){
    const token = await AsyncStorage.getItem('token');    
    const req = await fetch(`${BASE_API}/removeFavorite/${id}`,{
        method: 'POST',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    address = await req.json();    
}
export async function getUser (userRereived){
    const token = await AsyncStorage.getItem('token');    

    const req = await fetch(`${BASE_API}/user`,{
        method: 'GET',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        }
    });
    const json = await req.json();
    userRereived(json);
}
export async function updateUser (user){
    const token = await AsyncStorage.getItem('token');    
    const req = await fetch(`${BASE_API}/user`,{
        method: 'PUT',
        headers:{
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'Authorization' : `Bearer ${token}`
        },
        body: JSON.stringify(user)
    });
    user = await req.json();    
}