import React from 'react';
import { createStackNavigator } from '@react-navigation/stack';

import MainTab from '../stacks/MainTab';
import Employee from '../screens/Employee'
import Preload from '../screens/Preload';
import SignIn from '../screens/SignIn';
import SignUp from '../screens/SignUp';
import EmployeeCreate from '../screens/EmployeeCreate';
import Address from '../screens/Account/Address';
const Stack = createStackNavigator();

export default () => (
    <Stack.Navigator
        initialRouteName="Preload"
        screenOptions={{
            headerShown: false
        }}
    >
        <Stack.Screen name="Preload" component={Preload} />
        <Stack.Screen name="SignIn" component={SignIn} />
        <Stack.Screen name="SignUp" component={SignUp} />
        <Stack.Screen name="EmployeeCreate" component={EmployeeCreate} />
        <Stack.Screen name="MainTab" component={MainTab} />
        <Stack.Screen name="Employee" component={Employee} />


        <Stack.Screen name="Address" component={Address} />
    </Stack.Navigator>
);