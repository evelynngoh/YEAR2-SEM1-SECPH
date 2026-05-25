#include "SimpleCalc.h"
#include <iostream>
using namespace std;

SimpleCalc::SimpleCalc(double n1, double n2) {
    num1 = n1;
    num2 = n2;
}

double SimpleCalc::add() 
{
    return num1 + num2;
}

double SimpleCalc::subtract() 
{
    return num1 - num2;
}

double SimpleCalc::multiply() 
{
    return num1 * num2;
}

double SimpleCalc::divide() 
{
    if (num2 != 0) 
	{
        return num1 / num2;
    } 
	else 
	{
        cout << "Error: Division by zero!" << endl;
        return 0; 
    }
}
