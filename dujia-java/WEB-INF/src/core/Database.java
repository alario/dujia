package core;

import java.io.IOException;
import java.io.InputStream;

import org.apache.ibatis.io.Resources;
import org.apache.ibatis.session.SqlSession;
import org.apache.ibatis.session.SqlSessionFactory;
import org.apache.ibatis.session.SqlSessionFactoryBuilder;

import data.USRCaptcha;

public class Database {

	private static Database database = null;
	private static SqlSessionFactory sqlSessionFactory = null;

	private Database() {
		String resource = "data/mybatis-config.xml";
		try {
			InputStream inputStream = Resources.getResourceAsStream(resource);
			sqlSessionFactory = new SqlSessionFactoryBuilder()
					.build(inputStream);
			sqlSessionFactory.getConfiguration().addMapper(USRCaptcha.Mapper.class);
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	public SqlSession openSession() {
		return sqlSessionFactory.openSession();
	}

	public static Database getInstance() {
		if (database == null) {
			synchronized (Database.class) {
				if (database == null)
					database = new Database();
			}
		}
		return database;
	}
}