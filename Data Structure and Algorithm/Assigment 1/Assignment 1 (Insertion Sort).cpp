#include <iostream>
using namespace std;

void inser(int x[], int n, int &comp, int &swap)
{
    comp = 0; swap = 0;
    for (int i = 1; i < n; i++)
    {
        int y = x[i];
        int j = i - 1;

        while (j >= 0 && x[j] > y)
        {
            comp++;

            x[j + 1] = x[j];

            swap++;

            j = j - 1;
        }

        comp++;

        x[j + 1] = y;

        if (j + 1 != i)
        {
            swap++; // Count the swap for inserting the key
        }
    }
}

void printArray(int x[], int n)
{
    for (int i = 0; i < n; i++)
    {
        cout << x[i] << " ";
    }

    cout << endl;
}

int main()
{
    int x[] = {75, 95, 60, 88, 70};
    int n = sizeof(x) / sizeof(x[0]);

    int comp = 0, swap = 0;

    cout << "Unsorted array: ";
    printArray(x, n); // Print the array before sorting

    inser(x, n, comp, swap);

    cout << "Sorted array: ";
    printArray(x, n); // Print the array after sorting

    cout << "Total comparisons: " << comp << endl;
    cout << "Total swaps: " << swap << endl;

    system("pause");

    return 0;
}
