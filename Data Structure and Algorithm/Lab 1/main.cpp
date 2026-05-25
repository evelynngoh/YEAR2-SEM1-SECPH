#include "SimpleCalc.h"
#include <iostream>
using namespace std;

int main() {
    double num1, num2;
    
    cout << "Enter first number: ";
    cin >> num1;
    cout << "Enter second number: ";
    cin >> num2;

    SimpleCalc calculator(num1, num2);

    cout << "The result of addition is: " << calculator.add() << endl;
    cout << "The result of subtraction is: " << calculator.subtract() << endl;
    cout << "The result of multiplication is: " << calculator.multiply() << endl;
    cout << "The result of division is: " << calculator.divide() << endl;

    return 0;
}
