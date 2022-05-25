import firestore from '@react-native-firebase/firestore'
import auth from '@react-native-firebase/auth'



export async function getEmployees(employeeRereived) {
    var employeeList = [];
    const employees = await firestore()
        .collection('enployees')
        .get();

    employees.forEach(async(doc) => {
        employeeList.push({
            uid : doc.id,
            ...doc.data()
        });
    });

    employeeRereived(employeeList);
}

export async function getEmployee(uid) {
    var employeeList = [];
    const employee = await firestore()
        .collection('enployees')
        .doc(uid)
        .get();

    return employeeList;
}

export async function getEmployeeServicesList(uid) {
    var servicesList = [
        {
            nome: "Serviço 1",
            preco: "13.3"
        },
        {
            nome: "Serviço 2",
            preco: "99.9"
        },
        {
            nome: "Serviço 3",
            preco: "91"
        },
        {
            nome: "Serviço 4",
            preco: "99.999"
        },
        {
            nome: "Serviço 5",
            preco: "11199.11"
        }
    ]
    return servicesList;
}

export async function getEmployeeAgenda(uid) {

    var servicesList = [
        {
            date: "2022-05-12",
            hours: [
                "09:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-13",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-14",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-15",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "10:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-16",
            hours: [
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-17",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-18",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
        {
            date: "2022-05-19",
            hours: [
                "09:00",
                "09:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00"
            ]
        },
    ]
    return servicesList;
}