import React from 'react';
import { createStackNavigator } from '@react-navigation/stack';

import MainTab from '../stacks/MainTab';
import Employee from '../screens/Employee';
import Job from '../screens/Job';
import Preload from '../screens/Preload';
import SignIn from '../screens/SignIn';
import SignUp from '../screens/SignUp';
import EmployeeCreate from '../screens/EmployeeCreate';
import AddressIndex from '../screens/Account/Address/Index';
import AddressEdit from '../screens/Account/Address/Edit';
import AddressCreate from '../screens/Account/Address/Create';
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
        <Stack.Screen name="Job" component={Job} />


        <Stack.Screen name="AddressIndex" component={AddressIndex} />
        <Stack.Screen name="AddressEdit" component={AddressEdit} />
        <Stack.Screen name="AddressCreate" component={AddressCreate} />

    </Stack.Navigator>
    
);