import React, {useState, useEffect} from 'react';
import styled from 'styled-components/native';
import { useNavigation } from '@react-navigation/native';
import Checkbox from 'expo-checkbox';

import ExpandIcon from '../assets/expand.svg';
import NavPrevIcon from '../assets/nav_prev.svg';
import NavNextIcon from '../assets/nav_next.svg';

import {getEmployeeAgenda, storeJob} from '../api/EmployeeApi';

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


export default ({show, setShow, user, service, serviceAdditionals}) => {
    const navigation = useNavigation();
    const [agenda, setAgenda] = useState([]);
    const [selectedDay, setSelectedDay] = useState(0);
    const [selectedHour, setSelectedHour] = useState(0);

    const [selectedServiceAdditionals, setSelectedServiceAdditionals] = useState([]);
    
   

    useEffect(()=>{
        let today = new Date();
        service && getEmployeeAgenda(setAgenda, service.user_id);        
    }, [service])

    useEffect(()=>{
        console.log(agenda);
    }, [agenda])

    const handleLeftDateClick = () => {
        if(selectedDay > 0){
            setSelectedDay(selectedDay - 1);
        }        
    }

    const handleRightDateClick = () => {
        if(selectedDay + 1  < agenda.length){
            setSelectedDay(selectedDay + 1);
        }        
    }
    const handleSelectHourClick = (key) => {
        if(selectedHour != key){
            setSelectedHour(key);
        }        
    }

    useEffect(()=>{
    
        aux = [];
        serviceAdditionals && serviceAdditionals.map((item, k)=>(
            aux.push(false)
        ));
        setSelectedServiceAdditionals(aux);
    
    }, [serviceAdditionals])

    


    const handleCloseButton = () => {
        setShow(false);
    }
    const handleFinishClick = () => {
        let aux = [];
        serviceAdditionals && serviceAdditionals.map((item, k)=>{
            if(selectedServiceAdditionals[k]){
                aux.push(item.id);
            }
        })
        
        storeJob({
            "job_type_id" : service.id,
            "selected_date" : agenda[selectedDay].date,
            "selected_hour" : agenda[selectedDay].hours[selectedHour],
            "additionals" : aux
        });
        setShow(false);
        navigation.goBack();
        navigation.reset({
            routes: [{name: 'Appointments'}]
        });
        
    }

    const handleCheckboxChange = (newValue, key) => {
        let aux = [...selectedServiceAdditionals];
        aux[key] = newValue;
        setSelectedServiceAdditionals(aux);
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
                        <UserInfo>
                            <UserAvatar source={{uri:user.avatar}}/>
                            <UserName>{user.name}</UserName>
                        </UserInfo>
                    </ModalItem>
                    <ModalItem>
                        <ServiceInfo>
                            <ServiceName>{service && service.name}</ServiceName>
                            <ServicePrice>R$ {service && service.price.toFixed(2)}</ServicePrice>
                        </ServiceInfo>
                    </ModalItem>
                    
                    <ModalItem>
                        <ServiceInfo>
                            <ServiceDescription>{service && service.description}</ServiceDescription>
                        </ServiceInfo>
                    </ModalItem>
                    
                    {
                        serviceAdditionals && serviceAdditionals.length > 0 &&
                            <ModalItem>
                                <ServiceCustomText>Adicionais</ServiceCustomText>
                                {serviceAdditionals.map((item, k)=>(
                                    <ServiceInfo key={k}>
                                        <CheckBoxArea>
                                            <Checkbox
                                                color={selectedServiceAdditionals[k] ? '#00BAF4' : undefined}
                                                disabled={false}
                                                value={selectedServiceAdditionals[k]}
                                                onValueChange={(newValue) => handleCheckboxChange(newValue, k)}
                                            />
                                        </CheckBoxArea>
                                        <ServiceName>{item.name}</ServiceName>
                                        <ServicePrice>R$ {item.price.toFixed(2)}</ServicePrice>
                                    </ServiceInfo>
                                ))}
                            </ModalItem>
                    }
                    <ModalItem>
                        <DateInfo>
                            <DatePrevArea onPress={handleLeftDateClick}>
                                <NavPrevIcon width="35" height="35" fill="#000000" />
                            </DatePrevArea>
                            <DateTitleArea>
                                <DateTitle>{agenda && agenda[selectedDay] && agenda[selectedDay].date}</DateTitle>
                            </DateTitleArea>
                            <DateNextArea onPress={handleRightDateClick}>
                                <NavNextIcon width="35" height="35" fill="#000000" />
                            </DateNextArea>
                        </DateInfo>
                        <DateList horizontal={true} showsHorizontalScrollIndicator={false}>
                            {agenda && agenda[selectedDay] && agenda[selectedDay].hours.map((item,k)=>(
                                <DateHourArea onPress={() => handleSelectHourClick(k)} key={k}>
                                    {selectedHour == k?
                                        <SelectedDateHour>{item}</SelectedDateHour>:
                                        <DateHour>{item}</DateHour>
                                    }
                                </DateHourArea>
                            ))}
                        </DateList>
                    </ModalItem>                        
                    <FinishButton onPress={handleFinishClick}>
                        <FinishButtonText>Finalizar Agendamento</FinishButtonText>
                    </FinishButton>
                </ModalBody>
            </ModalArea>
        </Modal>
    )
}
