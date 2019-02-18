using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ClientWebServices_Ravaglia_Matteoni
{
    static class Commands
    {
        static string serverAddress = @"http://10.13.100.35/Rava/WebServices/"; 

        static string FirstQuery()
        {
            return serverAddress + "?op=1";
        }

        static string SecondQuery()
        {
            return serverAddress + "?op=2";
        }

        static string ThirdQuery(DateTime startDate, DateTime endDate)
        {

        }
    }
}
