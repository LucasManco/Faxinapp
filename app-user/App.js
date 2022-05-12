import React, { useState, useEffect }  from "react";
import { NavigationContainer } from "@react-navigation/native";
import UserContextProvider from './src/contexts/UserContext'
import MainStack from './src/stacks/MainStack'
import AuthStack from './src/stacks/AuthStack'
import auth, { FirebaseAuthTypes } from '@react-native-firebase/auth'


export default () => {
  const [user, setUser] = useState( null );
    useEffect(()=> {
        const subscriber = auth().onAuthStateChanged(setUser);
        return subscriber;
    },[]);
  return (
    <UserContextProvider>
      <NavigationContainer>
        {user ? <MainStack/> : <AuthStack />}        
      </NavigationContainer>
    </UserContextProvider>
  );
}