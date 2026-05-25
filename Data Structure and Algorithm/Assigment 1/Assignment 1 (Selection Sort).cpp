//Name: ANIS SAFIYYA BINTI JANAI 
//Date: 17 Nov 2024
//Assignment 1 DSA (Selection Sort)

#include <iostream>
using namespace std;

void selectionSort(int Data[], int n)
{
    int comparisonNum = 0;
    int swapNum = 0;

    for (int last = n-1; last >= 1; --last)
    {
        // select largest item in the Array
        int largestIndex = 0;

        // largest item is assumed start at index 0
        for (int p=1; p <= last; ++p)
        {
            if (Data[p] > Data[largestIndex])
            largestIndex = p;
            ++comparisonNum;
        }

        // swap largest item Data[largestIndex] with Data[last]
        if (Data[largestIndex] != Data[last])
        {
            swap(Data[largestIndex],Data[last]);
            ++swapNum;
        }
    }

    cout<< "\nTotal number of comparisons: " << comparisonNum;
    cout<< "\nTotal number of swaps: " << swapNum;

} // end selectionSort

void swap(int& x, int& y)
{
    int temp = x;
    x = y;
    y = temp;
} // end swap

void printArray(int Data[], int arraySize)
{
    for (int i = 0; i < arraySize; i++)
	{
        cout<< Data[i] << " ";
    }
    
	cout<< endl;
}

int main()
{
	int studentMarks[] = {75, 95, 60, 88, 70};
	int arraySize = 5;      // 5 stdent marks

	cout<<"Unsorted list of student marks: ";
	printArray(studentMarks, arraySize);
	
	selectionSort(studentMarks, arraySize);
	
	cout<<"\n\nSorted list of student marks: ";
	printArray(studentMarks,arraySize);
	
    system("pause");
	return 0;
}