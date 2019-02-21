using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Net.Http;

namespace ClientWebServices_Ravaglia_Matteoni
{
    /// <summary>
    /// Logica di interazione per MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }

        

        async static void GetRequest(string url)
        {
            using (HttpClient client = new HttpClient())
            {
                // Richiesta al server
                using (HttpResponseMessage response = await (client.GetAsync(url)))
                {
                    // Estrazione del contenuto
                    using (HttpContent content = response.Content)
                    {
                        string myContent = await (content.ReadAsStringAsync());

                        MessageBox.Show(myContent);                        
                    }
                }
            }
        }

        private void btn_Get_Click(object sender, RoutedEventArgs e)
        {
            // URL a cui inoltrare la richiesta
            string url = @"http://10.13.100.35/Rava/WebServices/?op=" +
                         "3&d1=2000-04-13&d2=2010-06-10";
            

            //op=3&d1=2000-04-13&d2=2010-06-10
            GetRequest(url);
        }

        private void btn_UltimiArrivi_Click(object sender, RoutedEventArgs e)
        {
            GetRequest(Command.FirstQuery());
        }

        private void btn_Scontati_Click(object sender, RoutedEventArgs e)
        {
            GetRequest(Command.SecondQuery());
        }

        private void btn_RicercaDate_Click(object sender, RoutedEventArgs e)
        {
            if ((dp_StartDate.SelectedDate != null) && (dp_EndDate.SelectedDate != null))
                GetRequest(Command.ThirdQuery((DateTime)dp_StartDate.SelectedDate, (DateTime)dp_EndDate.SelectedDate));
                //MessageBox.Show(Command.ThirdQuery((DateTime)dp_StartDate.SelectedDate, (DateTime)dp_EndDate.SelectedDate));
            else
                MessageBox.Show("Selezionare una data di inizio e una di fine", "Errore");


        }

        private void btn_CercaCarrello_Click(object sender, RoutedEventArgs e)
        {
            GetRequest(Command.FourthQuery(CodiceCarrello.Text));
        }
    }
}
