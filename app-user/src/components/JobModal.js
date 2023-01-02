import React, {useState, useEffect} from 'react';
import styled from 'styled-components/native';
import { useNavigation } from '@react-navigation/native';
import CheckBox from '@react-native-community/checkbox';
import DropDownPicker from 'react-native-dropdown-picker';

import ExpandIcon from '../assets/expand.svg';
import NavPrevIcon from '../assets/nav_prev.svg';
import NavNextIcon from '../assets/nav_next.svg';

import {finishJob} from '../api/JobApi';
import { CustomArea, CustomText, InputArea, Input } from '../assets/styles/common';


const Modal = styled.Modal``;

const ModalArea = styled.View`
    flex: 1;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: flex-end;
`;
const ModalBody = styled.View`
    background-color: #FFFFFF;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    min-height: 300px;
    padding: 10px 20px 40px 20px;
`;
const CloseButton = styled.TouchableOpacity`
    width:40px;
    height:40px;
`;
const ModalItem = styled.View`
    background-color:#FFFFFF;
    border-radius:10px;
    margin-bottom: 15px;
    padding:10px;
    border: 1px solid #00BAF4;
    z-index: 999999999;
`;
const UserInfo = styled.View`
    flex-direction:row;
    align-items: center;
    justify-content: center;
`;
const UserAvatar = styled.Image`
    width: 56px;
    height: 56px;
    border-radius: 20px;
    margin-right: 15px;
`;
const UserName = styled.Text`
    color: #000000;
    font-size: 18px;
    font-weight: bold;
`;
const ServiceInfo = styled.View`
    width: 100%;
    flex-direction:row;
    align-items: center;
    justify-content: space-between;
`;
const ServiceName = styled.Text`
    color: #000000;
    font-size: 16px;
    font-weight: normal;
`;
const ServiceCustomText = styled.Text`
    color: #000000;
    font-size: 18px;
    font-weight: bold;
`;
const CheckBoxArea = styled.View`
    border: 1px solid #00BAF4;
    border-radius: 10px;
    margin: 5px;
    padding:0;
`
const ServicePrice = styled.Text`
    color: #000000;
    font-size: 16px;
    font-weight: normal;
`;
const ServiceDescription = styled.Text`
    color: #000000;
    font-size: 16px;
    font-weight: normal;
`;
const FinishButton = styled.TouchableOpacity`
    background-color: #00BAF4;
    height: 60px;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    z-index: 1;
`;

const FinishButtonText = styled.Text`
    color: #FFFFFF;
    font-size: 19px;
    font-weight: bold;
`;

const DateInfo = styled.View`
    flex-direction: row;
`;
const DatePrevArea = styled.TouchableOpacity`
    flex: 1;
    justify-content: flex-end;
    align-items: flex-end;
`;
const DateNextArea = styled.TouchableOpacity`
    flex: 1;
    align-items: flex-start;
`;
const DateTitleArea = styled.View`
    width: 140px;
    justify-content: center;
    align-items: center;
`;
const DropDownArea = styled.View`
    z-index: 9999999;
`;

const DateTitle = styled.Text`
    color: #000000;
    font-size: 17px;
    font-weight: bold;
`;
const DateHourArea = styled.TouchableOpacity`
    width: 70px;
    justify-content: center;
    align-items: center;
`;
const DateHour = styled.Text`
    color: #000000;
    font-size: 17px;
    font-weight: bold;
    padding:10px;
    border-radius:10px;
`;
const SelectedDateHour = styled.Text`
    color: #000000;
    font-size: 17px;
    font-weight: bold;
    padding:10px;
    background-color: #00BAF4;
    border-radius:10px;
`;
const DateList = styled.ScrollView``;

const months = [
    'Janeiro',
    'Fevereiro',
    'Março',
    'Abril',
    'Maio',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro'
];
const week_days = [
    'Dom',
    'Seg',
    'Ter',
    'Qua',
    'Qui',
    'Sex',
    'Sab'
]


export default ({show, setShow, job}) => {
    const navigation = useNavigation();
    const [descriptionField, setDescriptionField] = useState('');

    const [openScore, setOpenScore] = useState(false);
    const [selectedScore, setSelectedScore] = useState('');
    const [items, setItems] = useState([
        {label: '1', value: '1'},
        {label: '2', value: '2'},
        {label: '3', value: '3'},
        {label: '4', value: '4'},
        {label: '5', value: '5'},
      ]);
    const handleCloseButton = () => {
        setShow(false);
    }
    const handleFinishClick = () => {
        finishJob({
            'score' : selectedScore,
            'description' : descriptionField
        }, job.id);
        setShow(false);                
    }


    
    return(
        <Modal
            transparent={true}
            visible={show}
            animationType="slide"
        >
            <ModalArea>
                <ModalBody>
                    <CloseButton onPress={handleCloseButton}>
                        <ExpandIcon width="40" height="40" fill="#00BAF4" />
                    </CloseButton>
                   
                    <ModalItem>
                        <CustomText>Qual nota você dá para os serviços prestados?</CustomText>
                        <DropDownArea>
                            <DropDownPicker
                                open={openScore}
                                value={selectedScore}
                                items={items}
                                setOpen={setOpenScore}
                                setValue={setSelectedScore}
                                setItems={setItems}
                                mode="SIMPLE"
                            />
                        </DropDownArea>
                        <CustomText>Gostaria de adicionar alguma observação?</CustomText>
                        <InputArea>
                            <Input
                                placeholder=""
                                placeholderTextColor="#00BAF4"
                                value={descriptionField}
                                onChangeText={setDescriptionField}
                            />
                        </InputArea>

                    </ModalItem>
                                  
                    <FinishButton onPress={handleFinishClick}>
                        <FinishButtonText>Finalizar Serviço</FinishButtonText>
                    </FinishButton>
                </ModalBody>
            </ModalArea>
        </Modal>
    )
}
