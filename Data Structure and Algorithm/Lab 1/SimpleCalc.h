#ifndef SIMPLECALC_H
#define SIMPLECALC_H

class SimpleCalc {
private:
    double num1, num2;

public:
    SimpleCalc(double n1 = 0, double n2 = 0);

    double add();
    double subtract();
    double multiply();
    double divide();
};

#endif
