namespace cadastro
{
    partial class frmMotorista
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.label1 = new System.Windows.Forms.Label();
            this.txtnome = new System.Windows.Forms.TextBox();
            this.pnlCabecalho = new System.Windows.Forms.Panel();
            this.label6 = new System.Windows.Forms.Label();
            this.pnlRodape = new System.Windows.Forms.Panel();
            this.panel1 = new System.Windows.Forms.Panel();
            this.txtcpf = new System.Windows.Forms.TextBox();
            this.label2 = new System.Windows.Forms.Label();
            this.txtidade = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.txtrota = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.txtturno = new System.Windows.Forms.TextBox();
            this.label5 = new System.Windows.Forms.Label();
            this.btnCadastar = new System.Windows.Forms.Button();
            this.pnlCabecalho.SuspendLayout();
            this.panel1.SuspendLayout();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(23, 12);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(90, 13);
            this.label1.TabIndex = 0;
            this.label1.Text = "Digite Seu Nome:";
            // 
            // txtnome
            // 
            this.txtnome.Location = new System.Drawing.Point(26, 42);
            this.txtnome.Name = "txtnome";
            this.txtnome.Size = new System.Drawing.Size(358, 20);
            this.txtnome.TabIndex = 1;
            // 
            // pnlCabecalho
            // 
            this.pnlCabecalho.BackColor = System.Drawing.Color.Gold;
            this.pnlCabecalho.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D;
            this.pnlCabecalho.Controls.Add(this.label6);
            this.pnlCabecalho.Location = new System.Drawing.Point(2, 0);
            this.pnlCabecalho.Name = "pnlCabecalho";
            this.pnlCabecalho.Size = new System.Drawing.Size(397, 83);
            this.pnlCabecalho.TabIndex = 10;
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label6.Location = new System.Drawing.Point(95, 23);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(212, 24);
            this.label6.TabIndex = 0;
            this.label6.Text = "Cadastro de Motorista";
            this.label6.Click += new System.EventHandler(this.label6_Click);
            // 
            // pnlRodape
            // 
            this.pnlRodape.BackColor = System.Drawing.Color.Gold;
            this.pnlRodape.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D;
            this.pnlRodape.Location = new System.Drawing.Point(1, 532);
            this.pnlRodape.Name = "pnlRodape";
            this.pnlRodape.Size = new System.Drawing.Size(397, 88);
            this.pnlRodape.TabIndex = 11;
            // 
            // panel1
            // 
            this.panel1.Controls.Add(this.btnCadastar);
            this.panel1.Controls.Add(this.txtturno);
            this.panel1.Controls.Add(this.label5);
            this.panel1.Controls.Add(this.txtrota);
            this.panel1.Controls.Add(this.label4);
            this.panel1.Controls.Add(this.txtidade);
            this.panel1.Controls.Add(this.label3);
            this.panel1.Controls.Add(this.txtcpf);
            this.panel1.Controls.Add(this.label2);
            this.panel1.Controls.Add(this.txtnome);
            this.panel1.Controls.Add(this.label1);
            this.panel1.Location = new System.Drawing.Point(3, 83);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(395, 452);
            this.panel1.TabIndex = 12;
            // 
            // txtcpf
            // 
            this.txtcpf.Location = new System.Drawing.Point(26, 110);
            this.txtcpf.Name = "txtcpf";
            this.txtcpf.Size = new System.Drawing.Size(358, 20);
            this.txtcpf.TabIndex = 3;
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(23, 80);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(82, 13);
            this.label2.TabIndex = 2;
            this.label2.Text = "Digite Seu CPF:";
            // 
            // txtidade
            // 
            this.txtidade.Location = new System.Drawing.Point(26, 187);
            this.txtidade.Name = "txtidade";
            this.txtidade.Size = new System.Drawing.Size(358, 20);
            this.txtidade.TabIndex = 5;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(23, 157);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(89, 13);
            this.label3.TabIndex = 4;
            this.label3.Text = "Digite Sua Idade:";
            // 
            // txtrota
            // 
            this.txtrota.Location = new System.Drawing.Point(26, 262);
            this.txtrota.Name = "txtrota";
            this.txtrota.Size = new System.Drawing.Size(358, 20);
            this.txtrota.TabIndex = 7;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(23, 232);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(85, 13);
            this.label4.TabIndex = 6;
            this.label4.Text = "Digite Sua Rota:";
            // 
            // txtturno
            // 
            this.txtturno.Location = new System.Drawing.Point(26, 332);
            this.txtturno.Name = "txtturno";
            this.txtturno.Size = new System.Drawing.Size(358, 20);
            this.txtturno.TabIndex = 9;
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(23, 302);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(150, 13);
            this.label5.TabIndex = 8;
            this.label5.Text = "Digite Seu Turno de Trabalho:";
            // 
            // btnCadastar
            // 
            this.btnCadastar.Location = new System.Drawing.Point(65, 377);
            this.btnCadastar.Name = "btnCadastar";
            this.btnCadastar.Size = new System.Drawing.Size(262, 51);
            this.btnCadastar.TabIndex = 11;
            this.btnCadastar.Text = "Cadastrar";
            this.btnCadastar.UseVisualStyleBackColor = true;
            this.btnCadastar.Click += new System.EventHandler(this.btnCadastar_Click);
            // 
            // frmMotorista
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(399, 622);
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.pnlRodape);
            this.Controls.Add(this.pnlCabecalho);
            this.Name = "frmMotorista";
            this.Text = "frmMotorista";
            this.pnlCabecalho.ResumeLayout(false);
            this.pnlCabecalho.PerformLayout();
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox txtnome;
        private System.Windows.Forms.Panel pnlCabecalho;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Panel pnlRodape;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.TextBox txtturno;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.TextBox txtrota;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TextBox txtidade;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.TextBox txtcpf;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Button btnCadastar;
    }
}