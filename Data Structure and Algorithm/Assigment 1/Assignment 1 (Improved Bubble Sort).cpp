#include <iostream>
using namespace std;

void improvedBubbleSort (int data[], int n)
{       int pass,temp;
		int comparisonCount=0;
		int swapCount=0;
         bool sorted = false; // false when swaps occur
         for (int pass = 1; (pass < n) && !sorted; ++pass)
         {     sorted = true; // assume sorted
                for (int x = 0; x < n-pass; ++x)
                {      
					comparisonCount++;
					if (data[x] > data[x+1])
                        {     // exchange items
                              temp = data[x];
                              data[x] = data[x+1];
                              data[x+1] = temp;
                              sorted = false; // signal exchange
                              swapCount++;
                          } // end if
                   } // end for
  		}//outer for
	cout<<"\nTotal number of comparisons: "<<comparisonCount<<endl;
    cout<<"Total number of swap: "<<swapCount<<endl;
} //end 

void printArray(int data[], int listSize)
{
	for (int i=0; i<listSize; i++)
	{
		cout<<data[i]<<" ";
	}
	cout<<endl;
}
                   

int main()
{
	int studentMarks[]={75,95,60,88,70};   //unsorted data

	int list = 5;
	cout<<"Original array: ";
	printArray(studentMarks,list);
	
	improvedBubbleSort(studentMarks,list);
	
	cout<<"\nImproved bubble sorted array in ascending order: ";
	printArray(studentMarks,list);
	
	return 0;
}