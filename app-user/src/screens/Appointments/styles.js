import React from 'react';
import styled from 'styled-components/native';

export const AppointmentsHeader = styled.TouchableOpacity`
    margin:15px;
    z-index: 999999;
`;

export const CategorieArea = styled.View`
    display:flex;
    flex-wrap:wrap;
    flex-direction:row;
    max-width: 100%;
    
`;
export const CategorieItem = styled.View`

    border: 1px solid #00BAF4;
    border-radius: 10px;
    justify-content: center;
    align-items: center;
    padding:5px;
    margin:5px;
`;
export const CategorieText = styled.Text`
    font-size: 13px;
    color: #00BAF4;
`;