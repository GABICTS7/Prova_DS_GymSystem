CREATE TABLE IF NOT EXISTS alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    plano VARCHAR(50) NOT NULL,  -- Ex: 'Básico', 'Plus'
    status ENUM('ativo', 'inativo') DEFAULT 'ativo',
    data_nascimento DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    especialidade VARCHAR(255) NOT NULL,  -- Ex: 'Musculação', 'Yoga', etc.
    email VARCHAR(255) NOT NULL UNIQUE
   );

   CREATE TABLE IF NOT EXISTS aulas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    horario TIME NOT NULL,  -- Exemplo: '08:00:00'
    professor_id INT NOT NULL,  -- Relaciona com a tabela professores
    FOREIGN KEY (professor_id) REFERENCES professores(id) ON DELETE CASCADE
);

-- tabela de usuários (para login de administrador)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);