using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClientWebServices_Ravaglia_Matteoni
{
    static class Command
    {
        private static string serverAddress = @"http://10.13.100.35/Rava/WebServices"; 

        public static string FirstQuery()
        {
            return serverAddress + "?op=1";
        }

        public static string SecondQuery()
        {
            return serverAddress + "?op=2";
        }

        public static string ThirdQuery(DateTime startDate, DateTime endDate)
        {
            string start = "d1=" + startDate.Year + "-" + startDate.Month + "-" + startDate.Day + "&";
            string end = "d2=" + endDate.Year + "-" + endDate.Month + "-" + endDate.Day;

            return serverAddress + "?op=3&" + start + end;

            //op=3&d1=2000-04-13&d2=2010-06-10
        }

        public static string FourthQuery(string cartCode)
        {
            return serverAddress + "?op=4&code=" + cartCode;
        }
    }
}
