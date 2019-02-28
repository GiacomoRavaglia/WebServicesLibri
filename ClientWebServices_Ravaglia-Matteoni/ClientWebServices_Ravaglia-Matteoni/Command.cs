using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClientWebServices_Ravaglia_Matteoni
{
    /*
     * Static class that have the following function:
     *   - generate the server's commands from user's input
     *   - format the received strings(remove unused chars and split into array) 
     */
    static class Command
    {
        // attributes
        private static string serverAddress = @"http://10.13.100.35/Rava/WebServices";      // the address of the server

        // method to request the first query to the server
        public static string FirstQuery()
        {
            return serverAddress + "?op=1";
        }

        // method to request the second query to the server
        public static string SecondQuery()
        {
            return serverAddress + "?op=2";
        }

        // method to request the third query to the server
        public static string ThirdQuery(DateTime startDate, DateTime endDate)
        {
            // local variables
            string start = "d1=" + startDate.Year + "-" + startDate.Month + "-" + startDate.Day + "&";      // the start date of the given period
            string end = "d2=" + endDate.Year + "-" + endDate.Month + "-" + endDate.Day;                    // the end date of the given period

            return serverAddress + "?op=3&" + start + end;
        }

        // method to request the fourth query to the server
        public static string FourthQuery(string cartCode)
        {
            return serverAddress + "?op=4&code=" + cartCode;
        }

        /* method that return an array which contains the results of the query
         * 
         * NOTE: the case's number are not equal to the query number
         */
        public static string[] ExtractContent(int operationCode, string result)
        {
            // local variables
            string formattedResult;             // the given string without non valid chars

            switch (operationCode)
            {
                // second query
                case 1:
                    formattedResult = result.Remove(0, 2);
                    formattedResult = formattedResult.Remove(formattedResult.Length - 2, 2);
                    formattedResult = formattedResult.Replace("\"", "");

                    return formattedResult.Split(',');

                // third and fourth query
                case 2:
                    formattedResult = result.Remove(0, 1);
                    formattedResult = formattedResult.Remove(formattedResult.Length - 1, 1);

                    return formattedResult.Split('#');

                default:
                    return null;
            }
        }
    }
}
