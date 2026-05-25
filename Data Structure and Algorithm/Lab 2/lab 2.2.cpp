#include <iostream>
using namespace std;

int sumUpTo (int n);

int main()
{
	int m,result;
	cout <<"Enter a number= ";
	cin>>m;
	result = sumUpTo(m);
	cout<<"The sum of all integers from 1 up to "<<m<<" = "<<result<<" (";
	
	for (int i=1;i<=m;i++)
	{
		cout<<i;
		if (i<m)
			cout<<" + ";
		else
		cout<<" = "<<result<<")";
	}
	return 0;
}

int sumUpTo(int n)
{
	if (n<=0) //base case
		return 0;
	else //recursive case
		return n + sumUpTo(n-1); //recursive function will call sumUpTo() repeatedly 
								 //by reducing n by 1 for each respective call
}