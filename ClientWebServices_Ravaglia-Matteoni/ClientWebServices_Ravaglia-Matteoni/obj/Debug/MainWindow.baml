   M S B A M L   `   `   `  ����^  ZClientWebServices_Ravaglia-Matteoni, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullY1clr-namespace:ClientWebServices_Ravaglia_Matteoni#ClientWebServices_Ravaglia_Matteoni  5   	   4    .ClientWebServices_Ravaglia_Matteoni.MainWindow   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   Clocal1clr-namespace:ClientWebServices_Ravaglia_Matteoni     5   	     � Title$  Client��5   	   $��332.655��6   $��1056.22��6)    � 
ResizeMode$ NoResize=�69   .��5	      � .+�5
   
   �� -   5         ��Name$ 	quantitar��5
      $��quantita��6$   $
��Left=�67   $��
11,173,0,0q�6R   $	��Top=�6f   $��89��6~   $��25��6�   
���   ���. 
�������6�   �� 5   
   -   5         ��Name$ _1��5      $?��9Quantita dei libri "Ultimi arrivi"
nel reparto "fumetti":��6   $
��Left=�6x   $	��Top=�6�   $��
11,121,0,0q�6�   $	��171��6�   
���   �
�������$��47��6�   �� 5   
   -   5        $ _2��5      $P��JElenco libri scontati in tutti i reparti (in ordine crescente
per sconto):��6   $
��Left=�6u   $	��Top=�6�   $��
215,10,0,0q�6�   $	��249��6�   $��42��6�   
���   �
�������6�   �� 5   
   -   5        $ _3��5      $3��-Elenco libri archiviati tra le seguenti date:��6   $
��Left=�6T   $	��Top=�6o   $��
499,10,0,0q�6�   $	��245��6�   
���   �
�������$��41��6�   �� 5   
   -   5        $ inizior��5      $��inizio��6!   $
��Left=�62   $	��Top=�6M   $��
499,57,0,0q�6e   $��40��6y   $��23��6�    J� RenderTransformOrigin$ -2.189,4.783&�6�   
���   �
�������6�   �� 5   
   -   5        $ finer��5      $
��fine��6   $
��Left=�6.   $	��Top=�6I   $��
499,85,0,0q�6a   $��40��6u   $��23��6�   $ -2.189,4.783&�6�   
���   �
�������6�   �� 5   
   -   5        $ _4��5      $n��hElenco libri e le rispettive informazioni  
( numero copie, username utente associato
 a quel carrello):��6   $
��Left=�6�   $	��Top=�6�   $��
779,10,0,0q�6�   $	��245��6�   $��75��6�   
���   �
�������6	  �� 5   
   -   5         ��Name$ CodiceCarrello��5      $
��Left=�6*   $��26��6E   $��
874,90,0,0q�6Q    �� TextWrapping$
 Wrap=�6e   $	��Top=�6y   $	��150��6�   �� 5   
   -	   5        $ Codice_Carrello_r��5      $��Codice Carrello��6+   $
��Left=�6E   $	��Top=�6`   $��
779,90,0,0q�6x   $��90��6�   $��26��6�   
���   �
�������6�   (  "System.Windows.Controls.DatePicker  5   
   -
   5          Name$ 
dp_EndDate��5      $
��Left=�6)   $��
544,85,0,0q�6D   $	��Top=�6X   $	��200��6p   �� 5   
   -   5        $ btn_UltimiArrivi��5      $��Cerca��6+   $
��Left=�6;   $��105,173,0,0q�6V   $	��Top=�6k   $��77��6�   $��25��6�   �� 5   
   -   5        $ btn_Scontati��5      $��Cerca��6'   $
��Left=�67   $��215,260,0,0q�6R   $	��Top=�6g   $	��249��6   6�   �� 5   
   -   5        $ btn_RicercaDate��5      $��Cerca��6*   $
��Left=�6:   $��499,260,0,0q�6U   $	��Top=�6j   $	��245��6�   6�   �� 5   
   -   5        $ btn_CercaCarrello��5      $��Cerca��6,   $
��Left=�6<   $��779,260,0,0q�6W   $	��Top=�6l   $	��245��6�   6�   �� 5   
   -   5         ��Name$ lst_LibriScontati��5      $
��Left=�6-   $	��198��6H   $��
215,57,0,0q�6U   $	��Top=�6i   $	��249��6�   �� 5   
   -   5        $ lst_LibriDate��5      $
��Left=�6)   $	��141��6D   $��499,114,0,0q�6Q   $	��Top=�6f   $	��245��6~     5   
   -   5        $ dp_StartDate��5      $
��Left=�6+   $��
544,56,0,0q�6F   $	��Top=�6Z   $	��200��6r   �� 5   
   -   5        $ lst_Carrello��5      $
��Left=�6(   $	��134��6C   $��779,121,0,0q�6P   $	��Top=�6e   $	��245��6}   5      5      