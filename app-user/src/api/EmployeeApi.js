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
        .doc('ABC')
        .get();

    employeeRereived(employee.data());
}