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
        // global variables
        string result;                                  // the string received from the server

        public MainWindow()
        {
            InitializeComponent();
        }

        async static Task<string> GetRequest(string url)
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
                        return myContent;
                    }
                }
            }
        }

        async private void btn_UltimiArrivi_Click(object sender, RoutedEventArgs e)
        {
            result = await (GetRequest(Command.FirstQuery()));

            MessageBox.Show("Libri trovati: " + result);
        }

        async private void btn_Scontati_Click(object sender, RoutedEventArgs e)
        {
            result = await(GetRequest(Command.SecondQuery()));

            foreach (string book in Command.ExtractContent(1, result))
                lst_LibriScontati.Items.Add(book + "%");
        }

        async private void btn_RicercaDate_Click(object sender, RoutedEventArgs e)
        {
            if ((dp_StartDate.SelectedDate != null) && (dp_EndDate.SelectedDate != null))
            {
                result = await (GetRequest(Command.ThirdQuery((DateTime)dp_StartDate.SelectedDate, (DateTime)dp_EndDate.SelectedDate)));

                foreach (string book in Command.ExtractContent(2, result))
                    lst_LibriDate.Items.Add(book);
            }
            else
                MessageBox.Show("Selezionare una data di inizio e una di fine", "Errore");
        }

        async private void btn_CercaCarrello_Click(object sender, RoutedEventArgs e)
        {
            // local variables
            string[] elements;                      // the data received from the server
            int codice;                             // the cart code inserted by the user

            if (CodiceCarrello.Text != "")
                if (int.TryParse(CodiceCarrello.Text, out codice))
                {
                    result = await (GetRequest(Command.FourthQuery(codice.ToString())));
                    elements = Command.ExtractContent(2, result);

                    // stampa dati nella listBox
                    lst_Carrello.Items.Clear();
                    lst_Carrello.Items.Add("Username: " + elements[0]);                    
                    for (int x = 1; x < elements.Length; x++)
                    {
                        string[] currentBook;
                        currentBook = elements[x].Split('-');

                        lst_Carrello.Items.Add("Titolo: " + currentBook[0] + "\tCopie: " + currentBook[1]);
                    }
                }
                else
                    MessageBox.Show("Il codice non può contenere lettere o simboli, ma soltanto numeri", "Errore");
            else
                MessageBox.Show("Inserire il codice del carrello", "Errore");
        }
    }
}
