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

namespace Client1
{
    /// <summary>
    /// Logica di interazione per MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        static string mycontent;
        static ListBox lst;
        public MainWindow()
        {
            InitializeComponent();
            lst = 1;
        }



        private void btn_richiesta1_Click(object sender, RoutedEventArgs e)
        {
            string url = "http://10.13.100.2/Lolli/Tp/Server.php?op=1&rep=" + 1.Text.ToLower() + "&sez=" + 2.Text.ToLower();
            Richiesta(url);
        }

        private void btn_richiesta2_Click(object sender, RoutedEventArgs e)
        {
            string url = "http://10.13.100.2/Lolli/Tp/Server.php?op=2";
            Richiesta(url);
        }

        private void btn_richiesta3_Click_1(object sender, RoutedEventArgs e)
        {
            string url = "http://10.13.100.2/Lolli/Tp/Server.php?op=3&d1=" + 1.Text + "&d2=" + 2.Text;
            Richiesta(url);
        }

        private void btn_richiesta_4_Click(object sender, RoutedEventArgs e)
        {
            string url = "http://10.13.100.2/Lolli/Tp/Server.php?op=4&id=" + 1.Text;
            Richiesta(url);
        }

        async static void Richiesta(string url)
        {
            using (HttpClient client = new HttpClient())
            {
                using (HttpResponseMessage response = await client.GetAsync(url))
                {
                    using (HttpContent content = response.Content)
                    {
                        mycontent = await content.ReadAsStringAsync();
                        string.spl
                        lst.Items.Clear();
                        lst.Items.Add(mycontent);
                    }

                }

            }
        }
    }
}