import React, { useState, useEffect }  from "react";
import { NavigationContainer } from "@react-navigation/native";
import UserContextProvider from './src/contexts/UserContext'
import MainStack from './src/stacks/MainStack';
import { registerRootComponent } from 'expo';


export default () => {
  return (
    <UserContextProvider>
      <NavigationContainer>
        <MainStack/>
      </NavigationContainer>
    </UserContextProvider>
  );
}