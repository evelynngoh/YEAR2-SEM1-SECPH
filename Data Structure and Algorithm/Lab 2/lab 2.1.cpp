#include <iostream>
using namespace std;

int powerOfTwo (int);

int main ()
{
	int m,result; 
	cout<<"Enter a number: ";
	cin>>m;
	result = powerOfTwo(m);
	cout<<m<<" to the power of two is "<<result;
	return 0;
}



int powerOfTwo(int n) {
	if (n==0) //base case 
		return 0;
	else if (n==1) //base case
		return 1;
	else //recursive case
    	return powerOfTwo(n-1) + (2*n-1);  // recursive function will call itself repeatedly 
										   //by reducing n by 1 for each respective call
}
