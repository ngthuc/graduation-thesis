package com.ngthuc.spsimct594.entity;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

import javax.persistence.*;
import java.util.HashSet;
import java.util.Set;

@Entity
@JsonIgnoreProperties(value = { "subordinates" })
@Table(name = "menu")
public class Menu {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "id", nullable = false)
	private Long id;

	@OneToOne
	@JoinColumn(name = "userId")
	private User user;

	@Column(name = "name", nullable = false)
	private String name;

	@Column(name = "level", nullable = false)
	private int level;

	@Column(name = "position", nullable = false)
	private int position;

	@Column(name = "type")
	private String type;

	@ManyToOne
	@JoinColumn(name="parentId")
	private Menu parent;

	@OneToMany(fetch = FetchType.LAZY,mappedBy="parent")
	private Set<Menu> subordinates = new HashSet<Menu>();

	public Menu() {}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public User getUser() {
		return user;
	}

	public void setUser(User user) {
		this.user = user;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public int getLevel() {
		return level;
	}

	public void setLevel(int level) {
		this.level = level;
	}

	public int getPosition() {
		return position;
	}

	public void setPosition(int position) {
		this.position = position;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public Menu getParent() {
		return parent;
	}

	public void setParent(Menu parent) {
		this.parent = parent;
	}
}
