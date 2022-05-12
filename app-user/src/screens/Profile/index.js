import React from 'react';
import { Text } from 'react-native';
import { Container } from './styles';
import auth from '@react-native-firebase/auth'
import { useNavigation } from '@react-navigation/native';


import {
    CustomButton,
    CustomButtonText
} from './styles';


export default () => {
    const navigation = useNavigation();

    const user = auth().currentUser;
    var email = "";

    if (user !== null) {
    // The user object has basic properties such as display name, email, etc.
    //   const displayName = user.displayName;
        email = user.displayName;
        id = user.uid;
        
    //   const photoURL = user.photoURL;
    //   const emailVerified = user.emailVerified;

    // The user's ID, unique to the Firebase project. Do NOT use
    // this value to authenticate with your backend server, if
    // you have one. Use User.getToken() instead.
    //   const uid = user.uid;
    }


    const handleSignOut = () => {
        console.log('logout');
        auth().signOut();
    }

    return (
        <Container>
            <Text>{email}</Text>
            <Text>{id}</Text>
            <CustomButton onPress={handleSignOut}>
                <CustomButtonText>Logout</CustomButtonText>
            </CustomButton>            
        </Container>
    );
}