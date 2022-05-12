import React from 'react';
import { createStackNavigator } from '@react-navigation/stack';

import MainTab from '../stacks/MainTab';
import Employee from '../screens/Employee'
const Stack = createStackNavigator();

export default () => (
    <Stack.Navigator
        initialRouteName="MainTab"
        screenOptions={{
            headerShown: false
        }}
    >
        <Stack.Screen name="MainTab" component={MainTab} />
        <Stack.Screen name="Employee" component={Employee} />
    </Stack.Navigator>
);